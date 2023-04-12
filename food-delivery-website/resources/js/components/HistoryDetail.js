import React, { Component } from 'react';
import { Modal, ModalHeader, ModalBody, ModalFooter } from 'reactstrap';

class HistoryDetailsModal extends Component {
    state = {
        orderDetails: [],
        
    };

    componentDidMount() {
      this.loadOrderItem()
    }

    loadOrderItem() {
        const url = `/api/historyitem/${this.props.orderId}`;
        axios.get(url).then((response) => {
            // console.log(response.data);
            this.setState({
                orderDetails: response.data
            })
        })
    }

    render() {
        let orderDetails = this.state.orderDetails.map((orderDetail) => {
            console.log(orderDetail);
            return (
                
                <tr key={orderDetail.item_id}>
                    <td className="text-center">{orderDetail["product"].product_name}</td>
                
                    <td className="text-center"><img src='$product[{orderDetail["product"].product_image}]'></img></td>


                    <td className="text-center">{orderDetail.quantity}</td>
                    <td className="text-center">
                        RM {orderDetail.Subtotal}
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
                                    <th className="text-center" >Image</th>
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

export default HistoryDetailsModal;
