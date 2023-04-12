import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Order extends Component {
    constructor() {
        super()
        this.state = {
            orders: []
        }
    }
    loadPost() {
        const orderElement = document.getElementById('order');
        const shopId = orderElement.dataset.shopId
        const url = `/admin/${shopId}/order`;
        axios.get(url).then((response) => {
            this.setState({
                orders: response.data
            })
        })
    }
    componentWillMount() {
        this.loadPost();
    }
    render() {
        let orders = this.state.orders.map((order) => {
            return (
                <tr key={order.id}>
                    <td></td>
                    <td>{order.id}</td>
                    <td>{order.order_date}</td>
                    <td >
                        <button className="btn btn-info bi bi-eye-fill custom-btn-margin"> View Details</button>
                    </td>
                </tr>
            )
        })
        return (

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

        );
    }
}




if (document.getElementById('order')) {
    ReactDOM.render(<Order />, document.getElementById('order'))
}
