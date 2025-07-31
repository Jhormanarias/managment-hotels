import axios from "axios";

const API = process.env.REACT_APP_API_URL;

export const getHotels = () => axios.get(`${API}/hotels`);
export const getHotel = (id) => axios.get(`${API}/hotels/${id}`);
export const createHotel = (data) => axios.post(`${API}/hotels`, data);
export const updateHotel = (id, data) => axios.put(`${API}/hotels/${id}`, data);
export const deleteHotel = (id) => axios.delete(`${API}/hotels/${id}`);
