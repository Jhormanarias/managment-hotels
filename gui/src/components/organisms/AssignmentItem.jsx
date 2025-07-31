import React from 'react';

const AssignmentItem = ({ assignment, onEdit, onDelete }) => (
  <li>
    {assignment.type} – {assignment.accommodation} – {assignment.quantity}
    <button onClick={() => onEdit(assignment)}>✏️</button>
    <button onClick={() => onDelete(assignment.id)}>🗑️</button>
  </li>
);

export default AssignmentItem;
