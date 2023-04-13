import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Modal, ModalHeader, ModalBody, ModalFooter, Button } from 'reactstrap'
import axios from 'axios';
import ItemDetailsModal from './ItemDetails.js';

export default class ListedItem extends Component {
    constructor() {
        super()
        this.state = {
            items: []
        }
    }

    componentWillMount() {
        this.loadItem();
    }

    loadItem() {
        const listedItemElement = document.getElementById('listedItem');
        const shopId = listedItemElement.dataset.shopId
        const url = `/api/shop/${shopId}/item`;
        axios.get(url).then((response) => {
            this.setState({
                items: response.data
            })
        })
    }
    render(){

        let items = this.state.items.map((item) => {
            return (
                <tr key={item.id}>
                    <td className="text-center">{item.product_image}</td>
                    <td className="text-center">{item.product_name}</td>
                    <td className="text-center">{item.product_price}</td>
                    <td className="text-center">
                        <button className="btn btn-info bi bi-pencil"> Edit Details</button>
                        <button className="btn btn-danger bi bi bi-trash"> Delete Item</button>
                    </td>
                </tr>
            )
        })

        return (
            <div>
                
                <div className="mx-5 my-5">
                    <button className="btn btn-info bi-plus-square"> Add Items</button>
                    <table className="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th className="text-center" >Item </th>
                                <th className="text-center" >Name</th>
                                <th className="text-center" >Product price</th>
                                <th className="text-center" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            { items }                        
                        </tbody>

                    </table>
                </div>
            </div>
        );
    }
 
}


if (document.getElementById('listedItem')) {
    ReactDOM.render(<ListedItem />, document.getElementById('listedItem'))
}
