import React, { useEffect, useState } from 'react';
import { getHotels, getHotel, deleteHotel } from '../services/hotelService';
import { getAssignments, deleteAssignment } from '../services/roomAssignmentService';
import HotelList from '../components/organisms/HotelList';
import HotelDetail from '../components/organisms/HotelDetail';
import AssignForm from '../components/organisms/AssignForm';
import AssignmentItem from '../components/organisms/AssignmentItem';
import HotelFormModal from '../components/organisms/HotelFormModal';


const Home = () => {
  const [hotels, setHotels] = useState([]);
  const [selectedHotel, setSelectedHotel] = useState(null);
  const [assignments, setAssignments] = useState([]);
  const [assignmentToEdit, setAssignmentToEdit] = useState(null);
  const [hotelModalVisible, setHotelModalVisible] = useState(false);
  const [hotelToEdit, setHotelToEdit] = useState(null);


  useEffect(() => {
    getHotels().then(res => setHotels(res.data));
  }, []);

  const handleSelectHotel = async (hotel) => {
    const detailed = await getHotel(hotel.id);
    setSelectedHotel(detailed.data);
    const res = await getAssignments(hotel.id);
    setAssignments(res.data);
  };

    const handleDeleteAssignment = async (assignmentId) => {
        if (!window.confirm('¿Estás seguro de eliminar esta asignación?')) return;
        await deleteAssignment(assignmentId);
        const res = await getAssignments(selectedHotel.id);
        setAssignments(res.data);
    };

    const handleCreateHotel = () => {
        setHotelToEdit(null);
        setHotelModalVisible(true);
    };

    const handleEditHotel = (hotel) => {
        setHotelToEdit(hotel);
        setHotelModalVisible(true);
    };

    const handleDeleteHotel = async (hotelId) => {
        if (!window.confirm("¿Eliminar este hotel?")) return;
        await deleteHotel(hotelId);
        getHotels().then(res => setHotels(res.data));
        setSelectedHotel(null);
    };


  return (
    <div style={{ display: 'flex', height: '100vh' }}>
          <HotelList
              hotels={hotels}
              onSelect={handleSelectHotel}
              onEdit={handleEditHotel}
              onDelete={handleDeleteHotel}
              onCreate={handleCreateHotel}
          />


      <div style={{ padding: '1rem', flex: 1 }}>
        <HotelDetail hotel={selectedHotel} />

        <h4>Asignaciones</h4>
        <ul>
                  {assignments.map(a => (
                      <AssignmentItem
                          key={a.id}
                          assignment={a}
                          onEdit={(item) => setAssignmentToEdit(item)}
                          onDelete={(id) => handleDeleteAssignment(id)}
                      />
                  ))}
              </ul>

        {/* <AssignForm hotel={selectedHotel} onAssign={() => handleSelectHotel(selectedHotel)} /> */}
              <AssignForm
                  hotel={selectedHotel}
                  onAssign={() => handleSelectHotel(selectedHotel)}
                  assignment={assignmentToEdit}
                  clearEdit={() => setAssignmentToEdit(null)}
              />
      </div>
          <HotelFormModal
              visible={hotelModalVisible}
              hotel={hotelToEdit}
              onClose={() => setHotelModalVisible(false)}
              onSave={()=> getHotels().then(res => setHotels(res.data))}
          />
    </div>
  );
};

export default Home;
