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

const confirmBtnStyle = {
    backgroundColor: 'green',
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
  console.log(items);
  console.log(itemss);
  console.log(ids );
    let itemlist = items.map(item => {
        return(
    <tr key={item[0]}>
        <td><Media object src={item[1].image} style={imgStyle}/></td>
        <td>{item[1].name}</td>
        <td>RM {item[1].price}</td>
        <td><QuantityPicker id={item.id} min={0} max={30} value={item[1].quantity} onChange={(value)=> {
                            item.quantity = value;
                            if(item.quantity == 0){

                                if (document.getElementById('popup')) {
                                    delete_id = item[0];
                                    ReactDOM.render(<GetPopup/>, document.getElementById('popup'));
                                }
                                }
                            
                        }}/></td>
    </tr>
    )})
    var str = itemlist.values();

    return (
      <div>
        <div className="container">
                <Table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>

                    </thead>
                    <tbody>
                        {itemlist}
                    </tbody>
                </Table>
            </div>
    </div>
    );
  }
  
  export default MyComponent;

function GetPopup(){
    
    const [show, setShow] = useState(false);
    const closeModal = () => setShow(false);
    return (
    <div>
    <Popup open={true} position="left center" modal={true} >
        <div className="modals">
          <div class="container"><br></br>
          <h3> Remove the selected item?</h3> <br></br>
          <div class="position-relative "><a href='/showCart' className='btn btn-light' >NOOOO</a> <a className='btn btn-primary' href={'removeItem/' + delete_id}>Remove</a></div><br></br>
          </div>
        </div>
    </Popup>
    </div>
    );
}



export {GetPopup};

if (document.getElementById('idphp')) {
    id = ([document.getElementById('idphp').value]);
}

if (document.getElementById('mycomp')) {
    ReactDOM.render(<MyComponent />, document.getElementById('mycomp'));
}






