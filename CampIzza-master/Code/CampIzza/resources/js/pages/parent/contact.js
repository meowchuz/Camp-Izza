const US = 'United States';
const CALIF = 'California';
const IRVINE = 'Irvine';
const US_CODE = 233;

let countries = [];
let states = [];

const countriesElement = document.getElementById('input-country');
const statesElement = document.getElementById('input-state');
const citiesElement = document.getElementById('input-city');
const zipcodeElement = document.getElementById('input-zipcode');

countriesElement.addEventListener('change', onChangeCountry);
statesElement.addEventListener('change', onChangeState);

initial();

async function initial() {
    await getCountries();
    const state = await getStates();
    await getCities(state.id);
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

                    countriesElement.appendChild(element);
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
                statesElement.innerHTML = '';
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
                    statesElement.appendChild(element);
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
                    cities,
                    _city;

                cities = res.data;
                citiesElement.innerHTML = '';
                _.forEach(cities, city => {
                    element = document.createElement('option');
                    element.value = city.id;
                    element.innerText = city.name;

                    if ('undefined' === typeof contact) {
                        if (IRVINE === city.name) {
                            _city = city;
                            element.selected = true;
                        }
                    } else {
                        if (contact.city === city.id) {
                            _city = city;
                            element.selected = true;
                        }
                    }
                    citiesElement.appendChild(element);
                });

                resolve(_city);
            } else {
                throw new Error('Cannot get cities');
            }
        }).catch(err => {
            reject(err);
        });
    });
}

async function onChangeCountry(e) {
    const country = e.target.value;

    if (US_CODE == country) {
        statesElement.disabled = false;
        zipcodeElement.disabled = false;

        const state = statesElement.value;
        await getCities(state);
    } else {
        statesElement.disabled = true;
        zipcodeElement.disabled = true;
    }
}

async function onChangeState(e) {
    const state = e.target.value;
    await getCities(state);
}
