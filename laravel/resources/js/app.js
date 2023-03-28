import './bootstrap';

import {createApp} from 'vue'
import ShowListCustomers from './components/ShowListCustomers.vue'
import CustomerDetails from './components/CustomerDetails.vue'

createApp(ShowListCustomers).mount("#ShowListCustomers")
createApp(CustomerDetails).mount("#CustomerDetails")

