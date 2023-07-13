import axios from "axios";

export default function ProcessorAPI() {
    return axios.get('obligation/listBotProcessor').then(response => {
        const processorOptions = response.data.processorLIst;
        console.log('hi', processorOptions);
        return processorOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}