import React, { Component} from 'react';
import ReactDOM from 'react-dom';
import { Modal, ModalHeader, ModalBody, ModalFooter, Button,Media} from 'reactstrap'
import axios from 'axios';
import ItemDetailsModal from './editItem.js';
import AddItemModal from './addItem.js';
export default class ListedItem extends Component {
    constructor() {
        super()
        this.state = {
            items: [],
            viewEditModal: false,
            modalId: null,
            viewAddModal: false,
            shopId: null

        }
    }

    componentWillMount() {
        this.loadItem();
    }

    loadItem() {
        const listedItemElement = document.getElementById('listedItem');
        const shopId = listedItemElement.dataset.shopId
        this.setState({
            shopId: shopId
        })
        const url = `/api/shop/${shopId}/item`;
        axios.get(url).then((response) => {
            this.setState({
                items: response.data
            })
        })
    }

    toggleViewEditModal = (id) => {
        this.setState({
            viewEditModal: !this.state.viewEditModal,
            modalId: id
        })
    }

    toggleViewAddModal = () => {
        this.setState({
            viewAddModal: !this.state.viewAddModal
        })
    }

    updateParentState = () => {
        this.setState({
            items: []
        }, () => {
            this.loadItem();
        });
    }
    render(){

        let items = this.state.items.map((item) => {
            return (
                <tr key={item.id}>
                    <td className="text-center"><Media object style={{ height: '100px', width: '100px' }} src={item.product_image ? item.product_image : '../img/product_img/napolitan.jpeg'}  /></td>
                    <td className="text-center">{item.product_name}</td>
                    <td className="text-center">RM {item.product_price}</td>
                    <td className="text-center">
                        <button onClick={() => this.toggleViewEditModal(item.id)} className="btn btn-info bi bi-pencil text-white"> Edit Details</button>
                        <button onClick={() => {
                            axios.delete(`/api/item/${item.id}`).then(() => {
                                this.loadItem();
                            })
                        }}  className="btn btn-danger bi bi bi-trash" > Delete Item</button>
                    </td>
                </tr>
            )
        })

        let itemDetailsModal = null;
        if (this.state.modalId) {
            itemDetailsModal = (
                <ItemDetailsModal
                    isOpen={this.state.viewEditModal}
                    toggle={() => this.toggleViewEditModal(null)}
                    itemId={this.state.modalId}
                    updateParentState={this.updateParentState}
                />
            );
        }

        let addItemModal = null;
        if (this.state.viewAddModal) {
            addItemModal = (
                <AddItemModal
                    isOpen={this.state.viewAddModal}
                    toggle={() => this.toggleViewAddModal()}
                    shopId={this.state.shopId}
                    updateParentState={this.updateParentState}
                />
            );
        }
        return (
            <div>
                {itemDetailsModal}
                {addItemModal}
                <h1 className="mt-4" style={{ textAlign: 'center' }}>Listed Items</h1>

                
                <div className="mx-5 my-5">
                    <button onClick={() => this.toggleViewAddModal()} className="btn btn-primary bi-plus-square"> Add Items</button>
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