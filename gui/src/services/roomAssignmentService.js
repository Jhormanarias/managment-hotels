import axios from 'axios';

const API = process.env.REACT_APP_API_URL;

export const getAssignments = (hotelId) =>
  axios.get(`${API}/hotels/${hotelId}/room-assignments`);

export const assignRoom = (hotelId, data) =>
  axios.post(`${API}/hotels/${hotelId}/room-assignments`, data);

export const updateAssignment = (id, data) =>
  axios.put(`${API}/room-assignments/${id}`, data);

export const deleteAssignment = (id) =>
  axios.delete(`${API}/room-assignments/${id}`);
