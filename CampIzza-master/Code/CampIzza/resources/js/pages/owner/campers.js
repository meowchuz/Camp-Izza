const US = 'United States';
const CALIF = 'California';

let countries = [];
let states = [];

const btnParentContact = document.getElementsByClassName('btn-parent');

const parent_1 = document.getElementById('input-parent-1');
const parent_2 = document.getElementById('input-parent-2');
const email_1 = document.getElementById('input-email-1');
const email_2 = document.getElementById('input-email-2');
const address_1 = document.getElementById('input-address-1');
const address_2 = document.getElementById('input-address-2');
const countryElement = document.getElementById('input-country');
const stateElement = document.getElementById('input-state');
const cityElement = document.getElementById('input-city');
const zipcode = document.getElementById('input-zipcode');
    
const phone_1 = document.getElementById('input-phone-1');
const phone_2 = document.getElementById('input-phone-2');
const phone_3 = document.getElementById('input-phone-3');
const phone_4 = document.getElementById('input-phone-4');
const phone_type_1 = document.getElementById('input-phone-type-1');
const phone_type_2 = document.getElementById('input-phone-type-2');
const phone_type_3 = document.getElementById('input-phone-type-3');
const phone_type_4 = document.getElementById('input-phone-type-4');
    
const emergency_name_1 = document.getElementById('input-emergency-name-1');
const emergency_name_2 = document.getElementById('input-emergency-name-2');
const emergency_relationship_1 = document.getElementById('input-emergency-relationship-1');
const emergency_relationship_2 = document.getElementById('input-emergency-relationship-2');
const emergency_phone_1 = document.getElementById('input-emergency-phone-1');
const emergency_phone_2 = document.getElementById('input-emergency-phone-2');

_.forEach(btnParentContact, (button) => {
    button.addEventListener('click', getContact);
});

function getContact(e) {
    const parentID = e.target.dataset.parent;
    console.log(e.target);
    
    axios.get(`/api/parents/${parentID}`).then(async (res) => {
        if (200 === res.status) {
            const data = res.data;

            await getCities(data.state);

            parent_1.value = data.parent_1;
            parent_2.value = data.parent_2;
            email_1.value = data.email_1;
            email_2.value = data.email_2;
            address_1.value = data.address_1;
            address_2.value = data.address_2;
            countryElement.value = data.country;
            stateElement.value = data.state;
            cityElement.value = data.city;
            zipcode.value = data.zipcode;

            phone_1.value = data.phone_1;
            phone_2.value = data.phone_2;
            phone_3.value = data.phone_3;
            phone_4.value = data.phone_4;
            phone_type_1.value = data.phone_type_1;
            phone_type_2.value = data.phone_type_2;
            phone_type_3.value = data.phone_type_3;
            phone_type_4.value = data.phone_type_4;

            emergency_name_1.value = data.emergency_name_1;
            emergency_name_2.value = data.emergency_name_2;
            emergency_relationship_1.value = data.emergency_relationship_1;
            emergency_relationship_2.value = data.emergency_relationship_2;
            emergency_phone_1.value = data.emergency_phone_1;
            emergency_phone_2.value = data.emergency_phone_2;
        } else {
            throw new Error('Has problem when get parent information');
        }
    }).catch((err) => {
        console.log(err);
    });
}

initial();

async function initial() {
    await getCountries();
    await getStates();
}

async function getCountries() {
    return new Promise((resolve, reject) => {
        axios.get('/api/countries').then(res => {
            if (200 === res.status) {
                let element,
                    _country;

                countries = res.data;
                _.forEach(countries, country => {
                    element = document.createElement('option');
                    element.value = country.id;
                    element.innerText = country.name;

                    if ('undefined' === typeof contact) {
                        if (US === country.name) {
                            element.selected = true;
                            _country = country;
                        }
                    } else {
                        if (contact.country === country.id) {
                            element.selected = true;
                            _country = country;
                        }
                    }

                    countryElement.appendChild(element);
                });

                resolve(_country);
            } else {
                throw new Error('Cannot get countries');
            }
        }).catch(err => {
            reject(err);
        });
    });
}

async function getStates() {
    return new Promise((resolve, reject) => {
        axios.get('/api/states').then(res => {
            if (200 === res.status) {
                let element,
                    _state;

                states = res.data;
                stateElement.innerHTML = '';
                _.forEach(states, state => {
                    element = document.createElement('option');
                    element.value = state.id;
                    element.innerText = state.name;

                    if ('undefined' === typeof contact) {
                        if (CALIF === state.name) {
                            _state = state;
                            element.selected = true;
                        }
                    } else {
                        if (contact.state === state.id) {
                            _state = state;
                            element.selected = true;
                        }
                    }
                    stateElement.appendChild(element);
                });

                resolve(_state);
            } else {
                throw new Error('Cannot get states');
            }
        }).catch(err => {
            reject(err);
        });
    });
}

async function getCities(state) {
    return new Promise((resolve, reject) => {
        axios.get(`/api/states/${state}`).then(res => {
            if (200 === res.status) {
                let element,
                    cities;

                cities = res.data;
                cityElement.innerHTML = '';

                _.forEach(cities, city => {
                    element = document.createElement('option');
                    element.value = city.id;
                    element.innerText = city.name;
                    cityElement.appendChild(element);
                });

                resolve({});
            } else {
                throw new Error('Cannot get cities');
            }
        }).catch(err => {
            reject(err);
        });
    });
}