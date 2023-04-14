import React, { Component } from 'react';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';

class ItemDetailsModal extends Component {
    state = {
        itemDetails: null,
        productName: '',
        productPrice: '',

    };

    componentDidMount() {
        this.loadItemDetail()
    }

    loadItemDetail() {
        const url = `/api/item/${this.props.itemId}`;
        axios.get(url).then((response) => {
            this.setState({
                itemDetails: response.data,
                productName: response.data.product_name,
                productPrice: response.data.product_price,
            })
        })
    }

    handleProductNameChange = (e) => {
        this.setState({ productName: e.target.value });
    }

    handleProductPriceChange = (e) => {
        this.setState({ productPrice: e.target.value });
    }

    handleUpdate = () => {
        const url = `/api/item/${this.props.itemId}`;
        axios.put(url, {
            product_name: this.state.productName,
            product_price: this.state.productPrice,
        }).then(() => {
            this.props.toggle();
            this.props.updateParentState();
        });
    }

    render() {

        return (
            <Modal isOpen={this.props.isOpen} toggle={this.props.toggle}>
                <ModalHeader toggle={this.props.toggle}>Edit Item Details </ModalHeader>
                <ModalBody>
                    {this.state.itemDetails && (
                        <>
                            <div>
                                <div className="form-group">
                                    <label>Product Name:</label>
                                    <input type="text" value={this.state.productName} onChange={this.handleProductNameChange} />
                                </div>
                                <div className="form-group">
                                    <label>Product Price:</label>
                                    <input type="number" value={this.state.productPrice} onChange={this.handleProductPriceChange} />
                                </div>
                                <div className="form-group">
                                    <label>Product Image:</label>
                                    <input type="text" value={this.state.productImg} onChange={this.handleProductImgChange} />
                                </div>
                            </div>
                        </>
                    )}
                </ModalBody>
                <ModalFooter>
                    <button onClick={this.handleUpdate} className="btn btn-primary">Update</button>
                    <button onClick={this.props.toggle}>Close</button>
                </ModalFooter>
            </Modal>
        );
    }
}

export default ItemDetailsModal;
