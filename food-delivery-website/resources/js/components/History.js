import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Modal, ModalHeader, ModalBody, ModalFooter, Button } from 'reactstrap'
import axios from 'axios';
import HistoryDetailsModal from './HistoryDetail';

export default class History extends Component {
    constructor() {
        super()
        this.state = {
            user:[],
            history: [],
            viewDetailsModal: false,
            modalId: null
        }
    }

    componentWillMount() {
        this.loadOrder();
    }

    loadOrder() {
        const orderElement = document.getElementById('history');
        const userId = orderElement.dataset.userId
        const url = `/api/history/${userId}`;
        axios.get(url).then((response) => {
            // console.log(response);
            // console.log(response.data[0]['orders']);
            this.setState({
                user: response.data,
                history: response.data[0]['orders']
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
        let history = this.state.history.map((history) => {
            // console.log(history);
            return (
                
                <tr key={history.id}>
                    <th className="text-center" >{history.id}</th>
                    <th className="text-center" >{history.order_date}</th>
                    <th className="text-center" >{history['shop'].shop_name}</th>
                    <th className="text-center" >{history.total_price}</th>
                    <td className="text-center">
                        <button onClick={() => this.toggleViewDetailsModal(history.id)} className="btn btn-info bi bi-eye-fill custom-btn-margin"> View Details</button>
                    </td>
                </tr>
            )
        })

        let historyDetailsModal = null;
        if (this.state.modalId) {
            historyDetailsModal = (
                <HistoryDetailsModal
                    isOpen={this.state.viewDetailsModal}
                    toggle={() => this.toggleViewDetailsModal(null)}
                    orderId={this.state.modalId}
                />
            );
        }

        

        return (
            <div>
                {historyDetailsModal}

                <div className="mx-5 my-5">
                    <table className="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th className="text-center" >Order Id</th>
                                <th className="text-center" >Order Date</th>
                                <th className="text-center" >Shop Name</th>
                                <th className="text-center" >Total_price</th>
                                <th className="text-center" >Order Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            {history}
                        </tbody>

                    </table>
                </div>
            </div>
        );
    }
}

if (document.getElementById('history')) {
    ReactDOM.render(<History />, document.getElementById('history'))
}
