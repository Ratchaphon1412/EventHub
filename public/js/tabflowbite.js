import { Tabs } from 'flowbite';

const tabElements = [
    {
        id: 'detail',
        triggerEl: document.querySelector('#detail-tab'),
        targetEl: document.querySelector('#detail')
    },
    {
        id: 'manage',
        triggerEl: document.querySelector('#manage-tab'),
        targetEl: document.querySelector('#manage')
    },
    {
        id:'team',
        triggerEl: document.querySelector('#team-tab'),
        targetEl: document.querySelector('#team')
    },
    {
        id:'kanban',
        triggerEl: document.querySelector('#kanban-tab'),
        targetEl: document.querySelector('#kanban')
    },
    {
        id:'question',
        triggerEl: document.querySelector('#question-tab'),
        targetEl: document.querySelector('#question')
    },
    {
        id:'approve',
        triggerEl: document.querySelector('#approve-tab'),
        targetEl: document.querySelector('#approve')
    }

]
const options = {
    defaultTabId: 'detail',
    activeClasses: 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    inactiveClasses: 'text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300',
    onShow: () => {
        console.log('tab is shown');
    }
};
export const   tabs = new Tabs(tabElements, options);



