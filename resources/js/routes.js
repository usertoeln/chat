import dashboard from "./components/dashboard";
import passport from './components/passport/index';
import users from "./components/users";
import groups from "./components/groups";
import public_board from "./components/public_board";
import public_send from "./components/public_send";

const routes = [
    {path: '/dashboard', name: 'dashboard', component: dashboard},
    {path: '/users', name: 'users', component: users},
    {path: '/groups', name: 'groups', component: groups},
    {path: '/passport', name: 'passport', component: passport},
    {path: '/public_send', name: 'public_send', component: public_send},
    {path: '/public_board', name: 'public_board', component: public_board},
];

export default routes;
