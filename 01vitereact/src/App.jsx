import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import Bat from './batman'

function App() {
const username = "Bruce Wayne"; 
  return (
    <>
    <h1>Hello, {username}</h1>
    <Bat/>
    </>
    
  )
}

export default App
