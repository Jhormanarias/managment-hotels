import React from 'react';

const HotelList = ({ hotels, onSelect, onEdit, onDelete, onCreate }) => (
  <div style={{ width: '30%', borderRight: '1px solid #ccc', padding: '1rem' }}>
    <h3>Hoteles</h3>
    <button onClick={onCreate}>+ Hotel</button>
    <ul style={{ listStyle: 'none', padding: 0 }}>
      {hotels.map(hotel => (
        <li key={hotel.id} style={{ marginBottom: '0.5rem' }}>
          <div
            style={{
              display: 'flex',
              justifyContent: 'space-between',
              alignItems: 'center',
              background: '#f8f8f8',
              padding: '0.5rem',
              borderRadius: '4px',
            }}
          >
            <span
              onClick={() => onSelect(hotel)}
              style={{ cursor: 'pointer', flex: 1 }}
            >
              {hotel.name}
            </span>

            <div style={{ display: 'flex', gap: '0.25rem' }}>
              <button onClick={() => onEdit(hotel)}>✏️</button>
              <button onClick={() => onDelete(hotel.id)}>🗑️</button>
            </div>
          </div>
        </li>
      ))}
    </ul>
  </div>
);

export default HotelList;

