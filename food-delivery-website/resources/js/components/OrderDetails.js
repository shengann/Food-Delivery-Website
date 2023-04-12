import React, { Component } from 'react';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';

class OrderDetailsModal extends Component {
    state = {
        orderDetails: null,
    };

    componentDidMount() {
        // Make API call to fetch order details based on this.props.id
        // fetch(`/api/orders/${this.props.id}`)
        //     .then(response => response.json())
        //     .then(data => this.setState({ orderDetails: data }));
    }

    render() {
        const { orderDetails } = this.state;

        return (
            <Modal isOpen={this.props.isOpen} toggle={this.props.toggle}>
                <ModalHeader toggle={this.props.toggle}>Order Details</ModalHeader>
                <ModalBody>
                </ModalBody>
                <ModalFooter>
                    <button onClick={this.props.toggle}>Close</button>
                </ModalFooter>
            </Modal>
        );
    }
}

export default OrderDetailsModal;
