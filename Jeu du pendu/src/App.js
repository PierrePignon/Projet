//import React from 'react';
/*handleClick1 () {
  const {selection,word} = this.state
  const a = word[0] + '';
  const b = a.split('')
  const selection2 = []
  const cola = [
    { id: 1, value1: b[0] },
    { id: 2, value: b[1] },
    { id: 3, value: b[2] },
    { id: 4, value: b[4] },
  ]
  selection[0]||selection[1]||selection[2]||selection[3]||selection[4]||selection[5]||
                      selection[6]||selection[7]||selection[8]||selection[9]
      
       if(selection.includes(`${cola.value}`)){
    console.log(`${cola.value}`,selection,'bitch')
    selection2.splice(`${cola.id}`, 0, selection);
    b.splice(`${cola.id}`,1)
    console.log('add',b,selection2, true)
    
  return selection2
       }
    
    else{
      console.log(selection,word[0],false)
    }
  
}*/
import './App.css';
import React, { Component } from 'react'
import shuffle from 'lodash.shuffle'
import PropTypes from 'prop-types'

const allWord= ['ABEILLE','MELANCOLIE',
'FOLIE','ARDOISE','AMBRE','SEVENTINE','MELODIE',
'FONTAINEBLEAU','IVOIRE','LOUP','OURS','MAGICIEN','CRISTAL','LINCEUL'];
const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

const HIDDEN_SYMBOL = '__'

const Mystere = ({ selection2, feedback,onClick}) => (
  <div className={`letter ${feedback}`} onClick={() => onClick(selection2)} >
    <span className="symbol">
      {feedback === 'hidden' ? HIDDEN_SYMBOL : selection2}
    </span>
  </div>
)

const Clavier = ({ letter, onClick, feedback}) => (
  <div style={{backgroundColor: `${feedback}`}} 
  className={"letter"} onClick={() => onClick(letter)}>
  <span className="lettreclavier">
  {letter}
  </span>
  
  </div>
)
const Counter = ({counter, gameState}) => (
  <div className="count">Nombre de tentative : {counter}/10
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
Clavier.protoTypes = {
  feedback: PropTypes.oneOf([
    'HIDDEN_SYMBOL',
    'letter'
    ]).isRequired
}
  /*Alpha.propTypes = {
    //feedback : PropTypes.oneOf([
      //'abcdefghijklmnopqrstuvwxyz'.split('')]).isRequire,
    index: PropTypes.number.isRequired,
    onClick: PropTypes.func.isRequired
    
  }*/

  class App extends Component{

  state = {
    word: this.generateWord(),
    selection : [],
    selection2: this.matched,
    letters: this.generateClavier(),
    gameState : "en cours",
  }

  generateWord() {
    const candidates = shuffle(allWord)
    const result = []
    const randomWord = candidates.pop()
   result.push(randomWord)
    // randomWord preleve le dernier element de la liste candidate
    for (var i = 1; i < randomWord.length; i++) { 
      result.push(Mystere) 
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
    return selection.includes(letter)
  }

  getFeedback2(letter) {
    const { word } = this.state
    for (let index = 0, len = letter.length; index < len; ++index) {
      if(word.includes(letter)){
    }
    return (letter)}
      
    }
  

handleClick = letter => {
  const { selection, gameState } = this.state
  if(gameState === "en cours") {
    this.setState({selection: [...selection, letter]}, this.gameState)
  }
  console.log(letter, 'clicked')
    return letter
  }

matched ( selection){
  const {word} = this.state
  const a = word[0] + '';
  let b = a.split('')
  const match = []
  
      for (let j = 0, len = b.length; j < len;  j++){
      if([...b].includes(selection[j])){
    console.log(selection[j],'bitch')
    //compteur = compteur +1
    match.push(selection[j])
                      }
      }
      return match
    } 

  goodPlace() {
        const {word,selection2} = this.state
  const a = word[0] + '';
  let b = a.split('')
  const table = [selection2[0]]
  //const selection2 = this.matched()
  if(table !==[]){
      for (let i = 0, len = b.length; i < len;  i++){
      console.log([table].includes(b[i]),b[i],table,'ws')
  if([table].includes(b[i])){  
    b = b.splice(i,1)
    //supprime la valeur ce trouvant a l'index du ieme emplacement
  }   console.log('add',b,table)
    }
  }
    return table
       }
  





newGame = () => {
  this.setState({
    selection: [], 
    word: this.generateWord(), 
    gameState : "en cours" })
}

trying = () => {
  const {word, selection} = this.state
  return selection.filter(elt => !word.includes(elt)).length
}

gameState = () => {
  const {word, selection} = this.state
  const lastTests = 10 - this.trying()
  const findWord = word.filter(elt => selection.includes(elt)).length === word.length
  if (lastTests > 0 && findWord) {
    this.setState({gameState : "gagné"})
  } else if (lastTests > 0 ) {
    return
  } else {
    this.setState({gameState : "perdu"})
  }
  return lastTests
}

    render(){
  const {word,letters,selection2} = this.state
  
return (
  <div className="hang">
  <div className="header">
  <h1 className="title">Jeu du pendu</h1>
          <button className="btn" onClick={this.newGame}>Nouvelle partie</button>
        </div>
<div className="hangman">
<div className="content">
        {word.map((letter,index) => (
          <Mystere
          letter ={letter}
          onClick={this.goodPlace(selection2)}
          feedback = {this.getFeedback (letter) ? "visible" : "hidden"}
          key={index}
              />    
  ))
    }
  </div>
     <Counter
        counter = {this.trying()}
        gameState = {this.state.gameState}
    />
   <div className="Alpha">
     
   { letters.map((letter, index) => (
     
     <Clavier
       letter={letter}
       key={index}
       onClick={this.handleClick}
       feedback={this.getFeedback(letter) ? "grey" : "#17a2b8"}
       />
   ))}
 </div>
 </div>
</div>
  
  )
}}


// expected output: true

export default App;
