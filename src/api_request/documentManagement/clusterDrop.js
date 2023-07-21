import axios from "axios";

export default function ClusterAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const clusterOptions = response.data.cluster;
        return clusterOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}