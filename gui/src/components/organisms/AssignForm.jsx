import React, { useEffect, useState, useContext } from 'react';
import { assignRoom, updateAssignment } from '../../services/roomAssignmentService';
import { AlertContext } from '../../context/alert/AlertContext';

const AssignForm = ({ hotel, onAssign, assignment, clearEdit }) => {
  const [form, setForm] = useState({
    type: '',
    accommodation: '',
    quantity: 1,
  });

  const { showAlert } = useContext(AlertContext);

  useEffect(() => {
    if (assignment) {
      setForm({
        type: assignment.type,
        accommodation: assignment.accommodation,
        quantity: assignment.quantity,
      });
    } else {
      setForm({ type: '', accommodation: '', quantity: 1 });
    }
  }, [assignment]);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!hotel) return;

    try {
      if (assignment) {
        await updateAssignment(assignment.id, form);
        showAlert('success', 'Asignación actualizada correctamente');
        clearEdit();
      } else {
        await assignRoom(hotel.id, form);
        showAlert('success', 'Asignación creada exitosamente');
      }

      setForm({ type: '', accommodation: '', quantity: 1 });
      onAssign();
    } catch (error) {
      // errores de Axios
      const message =
        error?.response?.data?.message ||
        error?.response?.data?.errors?.[Object.keys(error.response.data.errors)[0]]?.[0] ||
        'Error inesperado al procesar la asignación';

      showAlert('error', message);
    }
  };

  if (!hotel) return null;

  return (
    <form onSubmit={handleSubmit} style={{ marginTop: '1rem' }}>
      <h4>{assignment ? 'Editar asignación' : 'Asignar habitaciones'}</h4>

      <select name="type" value={form.type} onChange={handleChange} required>
        <option value="">Tipo</option>
        <option value="Estándar">Estándar</option>
        <option value="Junior">Junior</option>
        <option value="Suite">Suite</option>
      </select>

      <select name="accommodation" value={form.accommodation} onChange={handleChange} required>
        <option value="">Acomodación</option>
        <option value="Sencilla">Sencilla</option>
        <option value="Doble">Doble</option>
        <option value="Triple">Triple</option>
        <option value="Cuádruple">Cuádruple</option>
      </select>

      <input
        name="quantity"
        type="number"
        value={form.quantity}
        onChange={handleChange}
        placeholder="Cantidad"
        required
      />

      <button type="submit">
        {assignment ? 'Actualizar' : 'Asignar'}
      </button>

      {assignment && (
        <button type="button" onClick={clearEdit}>
          Cancelar edición
        </button>
      )}
    </form>
  );
};

export default AssignForm;
