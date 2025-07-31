import React, { useEffect, useState } from 'react';
import { createHotel, updateHotel } from '../../services/hotelService';

const HotelFormModal = ({ visible, onClose, onSave, hotel }) => {
  const [form, setForm] = useState({
    name: '',
    address: '',
    city: '',
    nit: '',
    max_rooms: 0,
  });

  useEffect(() => {
    if (hotel) {
      setForm(hotel);
    } else {
      setForm({ name: '', address: '', city: '', nit: '', max_rooms: 0 });
    }
  }, [hotel]);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (hotel) {
      await updateHotel(hotel.id, form);
    } else {
      await createHotel(form);
    }
    onSave();     // Refrescar lista de hoteles
    onClose();    // Cerrar modal
  };

  if (!visible) return null;

  return (
    <div style={modalStyles.overlay}>
      <div style={modalStyles.modal}>
        <h3>{hotel ? 'Editar hotel' : 'Nuevo hotel'}</h3>
        <form onSubmit={handleSubmit}>
          <input name="name" value={form.name} onChange={handleChange} placeholder="Nombre" required />
          <input name="address" value={form.address} onChange={handleChange} placeholder="Dirección" required />
          <input name="city" value={form.city} onChange={handleChange} placeholder="Ciudad" required />
          <input name="nit" value={form.nit} onChange={handleChange} placeholder="NIT" required />
          <input name="max_rooms" type="number" value={form.max_rooms} onChange={handleChange} placeholder="Máx habitaciones" required />

          <button type="submit">{hotel ? 'Actualizar' : 'Crear'}</button>
          <button type="button" onClick={onClose}>Cancelar</button>
        </form>
      </div>
    </div>
  );
};

const modalStyles = {
  overlay: {
    position: 'fixed',
    top: 0, left: 0,
    width: '100vw',
    height: '100vh',
    background: 'rgba(0,0,0,0.3)',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    zIndex: 999,
  },
  modal: {
    background: '#fff',
    padding: '2rem',
    borderRadius: '8px',
    width: '400px',
  },
};

export default HotelFormModal;
