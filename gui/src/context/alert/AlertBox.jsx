import React, { useContext } from 'react';
import { AlertContext } from './AlertContext';

const colors = {
  success: '#4CAF50',
  error: '#F44336',
  info: '#2196F3',
};

const AlertBox = () => {
  const { alert } = useContext(AlertContext);

  if (!alert) return null;

  return (
    <div style={{
      position: 'fixed',
      top: '1rem',
      right: '1rem',
      padding: '1rem 1.5rem',
      background: colors[alert.type] || '#333',
      color: '#fff',
      borderRadius: '5px',
      zIndex: 9999,
      boxShadow: '0 2px 10px rgba(0,0,0,0.2)'
    }}>
      {alert.message}
    </div>
  );
};

export default AlertBox;
