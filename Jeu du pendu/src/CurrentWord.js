import React from 'react'
import './App.css';

const Word = ({word,selection}) =>{
  return (
  <div className = "word_div">
    {
      word[0].split('').map(
        (letter,key) =>{
        let status = "finded"
        if(selection.indexOf(letter) === -1){
          status = "notfinded"
        }
         
        return <span id= "word_span" key={'letter_'+key} className ={status}>{status === 'finded'? letter : "__"}</span>
        }
      )
    }
  </div>)
}

export default Word