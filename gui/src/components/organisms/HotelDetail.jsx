import React from 'react';

const HotelDetail = ({ hotel }) => {
  if (!hotel) return <p>Selecciona un hotel</p>;

  return (
    <div>
      <h2>{hotel.name}</h2>
      <p><strong>Dirección:</strong> {hotel.address}</p>
      <p><strong>Ciudad:</strong> {hotel.city}</p>
      <p><strong>NIT:</strong> {hotel.nit}</p>
      <p><strong>Máx. habitaciones:</strong> {hotel.max_rooms}</p>
    </div>
  );
};

export default HotelDetail;

