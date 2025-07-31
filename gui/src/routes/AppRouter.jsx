import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from '../pages/Home';
import AlertBox from '../context/alert/AlertBox';

const AppRouter = () => (
  <Router>
    <Routes>
      <Route path="/" element={<>
      <AlertBox />
      <Home />
    </>} />
    </Routes>
  </Router>
);

export default AppRouter;
