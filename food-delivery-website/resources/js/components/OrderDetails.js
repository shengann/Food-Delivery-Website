import React, { Component } from 'react';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';

class OrderDetailsModal extends Component {
    state = {
        orderDetails: [],
    };

    componentDidMount() {
      this.loadOrderItem()
    }

    loadOrderItem() {
        const url = `/api/order-items/${this.props.orderId}`;
        axios.get(url).then((response) => {
            this.setState({
                orderDetails: response.data
            })
        })
    }

    render() {
        let orderDetails = this.state.orderDetails.map((orderDetail) => {
            return (
                <tr key={order.id}>
                    <td className="text-center">{orderDetail.product_id}</td>
                    <td className="text-center">{orderDetail.quantity}</td>
                    <td className="text-center">
                        RM {orderDetail.item_price}
                    </td>
                </tr>
            )
        })

        return (
            <Modal isOpen={this.props.isOpen} toggle={this.props.toggle}>
                <ModalHeader toggle={this.props.toggle}>Order Details </ModalHeader>
                <ModalBody>
                    <div className="mx-1 my-1">
                        <table className="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th className="text-center" >Item</th>
                                    <th className="text-center" >Quantity</th>
                                    <th className="text-center" >Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                {orderDetails}
                            </tbody>

                        </table>
                    </div>
                </ModalBody>
                <ModalFooter>
                    <button onClick={this.props.toggle}>Close</button>
                </ModalFooter>
            </Modal>
        );
    }
}

export default OrderDetailsModal;
