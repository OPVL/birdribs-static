// Import our custom CSS
import '../scss/styles.scss'

// Import vendors JS
import * as bootstrap from 'bootstrap'
import moment from 'moment';

// Import our custom JS
import events from './events';

const nextEvent = () => {
    // sort events by date and then get the next most recent event
    const  futureEvents = events.sort((a, b) => {
        // parse date with moment and compare
        moment(a.date, 'DD-MM-YYYY').isAfter(moment(b.date, 'DD-MM-YYYY'));
    }).filter((event) => {
        // filter out events that have already happened, but keep if they are today
        return moment(event.date, 'DD-MM-YYYY').isAfter(moment().subtract(1, 'days'));
    });

    if (futureEvents.length === 0) {
        return;
    }

    return futureEvents[0]; 
};

// function doesn't work as cannot close or modify the notice as the script is not a child of the DOM
// export const close = () => {
//     const notice = document.getElementById('notice');
//     notice.style.display = 'none';
// };

window.addEventListener('DOMContentLoaded', () => {
    const event = nextEvent();

    if (event) {
        console.log(event);
        // create a new notice element
        const notice = document.createElement('div');
        notice.id = 'notice';
        notice.innerHTML = `<div class="content"><a href="${event.link}" target="_blank" rel="noreferrer noopener">${event.label}</a></div>`;
                
        // append the notice to the body
        document.getElementById('bottom-mount').appendChild(notice);
    }
});
