import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Modal, ModalHeader, ModalBody, ModalFooter, Button } from 'reactstrap'
import axios from 'axios';
import OrderDetailsModal from './OrderDetails';

export default class Order extends Component {
    constructor() {
        super()
        this.state = {
            orders: [],
            viewDetailsModal: false,
            modalId: null
        }
    }

    componentWillMount() {
        this.loadOrder();
    }

    loadOrder() {
        const orderElement = document.getElementById('order');
        const shopId = orderElement.dataset.shopId
        const url = `/api/orders/${shopId}`;
        axios.get(url).then((response) => {
            this.setState({
                orders: response.data[0]['get_order']
            })
        })
    }

    toggleViewDetailsModal = (id) => {
        this.setState({
            viewDetailsModal: !this.state.viewDetailsModal,
            modalId: id
        })
    }

    render() {
        let orders = this.state.orders.map((order) => {
            return (
                <tr key={order.id}>
                    <td className="text-center">{order['user'].name}</td>
                    <td className="text-center">{order.id}</td>
                    <td className="text-center">{order.order_date}</td>
                    <td className="text-center ">
                        <button onClick={() => this.toggleViewDetailsModal(order.id)} className="text-white btn btn-primary bi bi-eye-fill custom-btn-margin" > View Details</button>
                    </td>
                </tr>
            )
        })

        let orderDetailsModal = null;
        if (this.state.modalId) {
            orderDetailsModal = (
                <OrderDetailsModal
                    isOpen={this.state.viewDetailsModal}
                    toggle={() => this.toggleViewDetailsModal(null)}
                    orderId={this.state.modalId}
                />
            );
        }

        

        return (
            <div>
                {orderDetailsModal}
                <h1 className="mt-4" style={{ textAlign: 'center' }}>Order Received</h1>


                <div className="mx-5 my-5">
                    <table className="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th className="text-center" >User</th>
                                <th className="text-center" >Order ID</th>
                                <th className="text-center" >Time</th>
                                <th className="text-center" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            {orders}
                        </tbody>

                    </table>
                </div>
            </div>
        );
    }
}

if (document.getElementById('order')) {
    ReactDOM.render(<Order />, document.getElementById('order'))
}