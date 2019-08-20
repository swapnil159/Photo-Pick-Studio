import React from 'react';
import './App.css';
import Main from './components/Main';
import Navbar from './components/user/Navbar';

function App() {
  return (
    <div>
      <Navbar></Navbar>
      <div className="container">
        <Main></Main>
      </div>
    </div>
  );
}

export default App;
