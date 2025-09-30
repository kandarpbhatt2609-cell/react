import { StrictMode } from 'react'
import React from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'


function Hello() {
  return <>
    <h1>Hello, world!</h1>
  </>
}

// const ReactElement = {
//     type:'a',
//     props:{
//         href:'https://www.google.com',
//         target:'_blank',

//     },
//     children:'click me to vist google'
// }

const anotheruser = "Bruce Wayne";

const anotherReactElement = 
<a href="https://www.google.com" 
target="_blank">Click me to visit Google 
</a>

const ReactElement2 = React.createElement('a',{
    href:'https://www.google.com',
    target:'_blank'
},'click me to visit google', 
anotheruser
)

createRoot(document.getElementById('root')).render(
ReactElement2  
)
