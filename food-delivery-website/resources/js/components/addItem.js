import React, { Component } from 'react';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';
import axios from 'axios';

class AddDetailsModal extends Component {
    state = {
        product_name: '',
        product_price: '',
        product_image: '',
        error: ''
    };

    handleInputChange = (event) => {
        const { name, value } = event.target;
        this.setState({
            [name]: value
        });
    }

    handleSubmit = (event) => {
        event.preventDefault();

        const data = {
            product_name: this.state.product_name,
            product_price: this.state.product_price,
            product_image: this.state.product_image,
            shop_id: this.props.shopId
        };

        axios.post('/api/item', data)
            .then((response) => {
                console.log(response.data);
                this.props.toggle();
            })
            .catch((error) => {
                console.log(error.response);
                this.setState({
                    error: error.response.data.message
                })
            });
    }

    render() {
        return (
            <Modal isOpen={this.props.isOpen} toggle={this.props.toggle}>
                <ModalHeader toggle={this.props.toggle}>Add New Item </ModalHeader>
                <ModalBody>
                    <form onSubmit={this.handleSubmit}>
                        <div className="form-group my-4">
                            <label>Product Name: </label>
                            <input   type="text" name="product_name" value={this.state.product_name} onChange={this.handleInputChange} />
                        </div>
                        <div className="form-group my-4">
                            <label>Product Price: </label>
                            <input  type="number" name="product_price" value={this.state.product_price} onChange={this.handleInputChange} />
                        </div>
                        <div className="form-group my-4">
                            <label>Product Image: </label>
                            <input type="text" name="product_image" value={this.state.product_image} onChange={this.handleInputChange} />
                        </div>
                        {this.state.error && <div className="alert alert-danger">{this.state.error}</div>}
                    </form>
                </ModalBody>
                <ModalFooter>
                    <button type="submit" className="btn btn-primary ">Create new item</button>
                        <button className="btn btn-secondary"onClick={this.props.toggle}>Close</button>
                </ModalFooter>
            </Modal>
        );
    }
}

export default AddDetailsModal;