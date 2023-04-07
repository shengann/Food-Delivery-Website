import React, { useState, useEffect}  from 'react';
import ReactDOM from 'react-dom';
import { QuantityPicker } from 'react-qty-picker';
import Popup from 'reactjs-popup';
import '/css/app.css';
import { Table, Button, Media} from 'reactstrap';
import 'reactjs-popup/dist/index.css';



var qty, id; 
var delete_id; 

const imgStyle = {
    maxHeight: 128,
    maxWidth: 128
  }

if (document.getElementById('quantityphp')){
    qty = document.getElementById('quantityphp').value;
    console.log(qty);
    console.log("cibai");
}


const MyComponent = () => {
    const [sessionData, setSessionData] = useState([]);
  
    useEffect(() => {
      const sessionDataInput = document.getElementById('session-data');
      const sessionDataJson = sessionDataInput.value;
      const sessionData = JSON.parse(sessionDataJson);
      setSessionData(sessionData);
      console.log(sessionDataJson);
      console.log(sessionData);
      
    }, []);
  
    // Render your component using the sessionData state
  const items = Object.entries(sessionData);
  const itemss = Object.values(items);
  const ids= Object.keys(sessionData);
//   const details = Object.keys(items);
  console.log(items);
  console.log(itemss);
  console.log(ids );
//   for (var i = 0; i < 2; i++)
//   {
//     console.log(itemss[i][0][1]);
//   }
//   console.log(details);
    let itemlist = items.map(item => {
        return(
    <tr key={item[0]}>
        <td><Media object src={item[1].image} style={imgStyle}/></td>
        <td>{item[1].name}</td>
        <td>{item[1].price}</td>
        <td><input type="hidden" id="idphp"  value={item[0]}></input></td>
        <td><QuantityPicker id={item.id} min={0} max={30} value={item[1].quantity} onChange={(value)=> {
                            console.log(item[0]+"nimi");
                            item.quantity = value;
                            console.log(item.quantity + "wow");
                            if(item.quantity == 0){

                                if (document.getElementById('popup')) {
                                    delete_id = item[0];
                                    ReactDOM.render(<Example2/>, document.getElementById('popup'));
                                    console.log(delete_id + 'bibi');
                                }
                                }
                            
                        }}/></td>
    </tr>
    )})
    console.log(itemlist);

    return (
      <div>
        <div className="container">
                <Table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        {itemlist}
                    </tbody>
                </Table>
            </div>
         <h1>My Session Data</h1>
        <ul>
          {items.map(item => (
            <li key={item.id}>{item.name}{item.price}</li>
            // {item.quantity}{item.price}{item.image}
          ))}
         </ul>
    </div>
    // <ul>{items}</ul>
    );
  }
  
  export default MyComponent;


// function Example(){

//     return (
//         <div className="container">
//             <div className="row justify-content-center">
//                 <div className="">
//                         <QuantityPicker min={0} max={30} value={qty} onChange={(value)=> {
//                             console.log(value);
//                             qty = value;
//                             console.log(qty + "wow");
//                             if(qty == 0){
//                                 if (document.getElementById('popup')) {
//                                     console.log("kukujiao   ");
//                                     ReactDOM.render(<Example2/>, document.getElementById('popup'));

//                                 }
//                                 }
                            
//                         }}/>
//                 </div>
//             </div>
//         </div>

//     );
    
// }

function Example2(){
    
    const [show, setShow] = useState(false);
    const closeModal = () => setShow(false);
    console.log(delete_id +"i wan sleep");
    return (
    <div>
    <Popup open={true} position="left center"  closeOnDocumentClick onClose={closeModal}>
        <div className="modals">
          <a className="closes btn" onClick={closeModal}>
          &times;
          </a>
          Remove the selected item?
          <div><a href='/home' className='btn btn-light' >NOOOO</a> <a className='btn btn-primary' href={'removeItem/' + delete_id}>Remove</a></div>
          
        </div>
    </Popup>
    </div>
    );
}

export {Example2};
// export {Popup};

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

if (document.getElementById('idphp')) {
    id = ([document.getElementById('idphp').value]);
    console.log(id + "mimi");
}

if (document.getElementById('mycomp')) {
    ReactDOM.render(<MyComponent />, document.getElementById('mycomp'));
}





