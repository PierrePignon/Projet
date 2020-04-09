import './App.css';
import React, { Component } from 'react'
import shuffle from 'lodash.shuffle'
import PropTypes from 'prop-types'
import Word from './CurrentWord'

const allWord= ['ABEILLE','MELANCOLIE',
'FOLIE','ARDOISE','AMBRE','SEVENTINE','MELODIE',
'FONTAINEBLEAU','IVOIRE','LOUP','OURS','MAGICIEN','CRISTAL','LINCEUL'];
const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

const Clavier = ({ letter, onClick, feedback}) => {
  return(
  <div className="keyboard" onClick={() => onClick(letter)}>
    {
      <div className ={`button ${feedback}`} >  {letter}</div> 
}
  
  </div>)
}


const Counter = ({counter, gameState}) => (
  <div className="count">Nombre de tentative : {counter}/8
      <div className="state">
        Partie {gameState}
        </div>
  </div>
)

Counter.propTypes = {
  counter: PropTypes.number.isRequired,
  gameState: PropTypes.oneOf([
    'en cours',
    'perdu',
    'gagné',
  ]).isRequired,
}  
  class App extends Component{

  state = {
    word: this.generateWord(),
    selection : [],
    match: [],
    letters: this.generateClavier(),
    gameState : "en cours",
    attempt:0,
    win:0,
  }

  generateWord() {
    const candidates = shuffle(allWord)
    const result = []
    const randomWord = candidates.pop()
   result.push(randomWord)
    // randomWord preleve le dernier element de la liste candidate
    for (var i = 1; i < randomWord.length; i++) { 
      result.push(Word) 
    }
    console.log(result[0], randomWord.length)
     return result
  }


  generateClavier(){
    const result = []
    const allLetters = alphabet.split('')
    const size =26
    
    while(result.length< size){
      const pickLetter = allLetters.shift()  
      result.push(pickLetter)
    }
    console.log(result)
    return (result)
}




getFeedback(letter) {
  const { selection } = this.state
    return selection.includes(letter) ? 'hidden' : "visible"
  }

handleClick = letter => {
  const { selection, gameState } = this.state
  let attempt = this.state.attempt
  if(gameState === "en cours") {
    this.setState({selection: [...selection, letter]}, this.gameState)
    if(this.state.word[0].indexOf(letter)===  -1){
     attempt = this.state.attempt +1
    }
    let win = 1
    for (let i =0 ; i<this.state.word[0].length;i++){
      if(selection.indexOf(this.state.word[0]) === -1){
        win = -1
      }
    }
    if(attempt === 8 && win === -1){
      win = -1
    }
    this.setState({attempt, win})
  }
  console.log(letter, 'clicked')
    return letter
  }

matched =letter => {
  const {word,match,selection} = this.state
  //const a = word[0] + '';
  let b = (word[0] + '').split('')
  if ([...b].includes(letter) !== true){
    console.log(letter,'mauvaise letter')
  }
    if([...b].includes(letter)){
    console.log(letter,'letter')   
    selection.push(letter)
    for(let i =0,len = b.length;i<len;i++){
  for (let j = 0, len = b.length; j < len;  j++){
    if(selection[j] === letter && selection[j] === b[i]){ 
      match[i] = b[i]      
    }  
  }
}

}} 

newGame = () => {
  this.setState({
    selection: [], 
    word: this.generateWord(),
    match:[], 
    attempt:0,
    gameState : "en cours" })
    
}

gameState = () => {
  const lastTests = 8 - this.state.attempt
  
  if (lastTests > 0 && this.state.win ===1) {
    this.setState({gameState : "gagné"})
  } else if (lastTests > 0 ) {
    return


  } else {
    this.setState({gameState : "perdu"})
  }
  return lastTests
}



    render(){
  const {letters} = this.state
return (
  <div className="hang">
  <div className="header">
  <h1 className="title">Jeu du pendu</h1>
          <button className="btn" onClick={this.newGame}>Nouvelle partie</button>
        </div>
<div className="hangman">

 {
   (this.state.word !== null) && 
   <Word 
   word={this.state.word}
   selection={this.state.selection}
   />
 }

<div className =" game_div" >
     <Counter
      
        counter = {this.state.attempt}
        gameState = {this.state.gameState}
    />
 </div>
</div>

 <div className="Alpha">
     <div className="alphaCont">
     { letters.map((letter, index) => (
    
    <Clavier
      letter={letter}
      key={index}
      onClick={() => {this.handleClick(letter); this.matched(letter);}}
      feedback={this.getFeedback(letter)}
      />
  ))
     }
 </div>
</div>
</div>
)

}}

// expected output: true

export default App;
