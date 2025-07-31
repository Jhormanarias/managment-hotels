import React, { useState } from 'react';
import { createHotel } from '../../services/hotelService';
import { useNavigate } from 'react-router-dom';

const HotelForm = () => {
  const [form, setForm] = useState({ name: '', address: '', city: '', nit: '', max_rooms: 0 });
  const navigate = useNavigate();

  const handleChange = e => setForm({ ...form, [e.target.name]: e.target.value });

  const handleSubmit = async e => {
    e.preventDefault();
    await createHotel(form);
    navigate('/');
  };

  return (
    <form onSubmit={handleSubmit}>
      <input name="name" placeholder="Nombre" onChange={handleChange} required />
      <input name="address" placeholder="Dirección" onChange={handleChange} required />
      <input name="city" placeholder="Ciudad" onChange={handleChange} required />
      <input name="nit" placeholder="NIT" onChange={handleChange} required />
      <input name="max_rooms" type="number" placeholder="Máximo habitaciones" onChange={handleChange} required />
      <button type="submit">Guardar</button>
    </form>
  );
};

export default HotelForm;
