import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";

import "./assets/main.css";

axios.defaults.baseURL = import.meta.env.VITE_API_ENDPOINT;
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

const app = createApp(App);

app.use(router);
app.mount("#app");
