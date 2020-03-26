import React from 'react';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Welcome from '../pages/welcome';
import Login from '../pages/auth/login';
import Register from '../pages/auth/register';
import ForgotPassword from '../pages/auth/forgot-password';
import ResetPassword from '../pages/auth/reset-password';
import NotFound from '../pages/404';
import Home from '../pages/home';
import Profile from '../pages/profile';
import AuthRoute from './auth-route';
import GuestRoute from './guest-route';
import {useAuth} from '../context/auth';
import FullPageSpinner from '../components/full-page-spinner';

function App() {
    let {initializing} = useAuth();
    return (
        initializing
            ? <FullPageSpinner/>
            : <Router>
                <div className="flex flex-col min-h-screen">
                    <Switch>
                        <GuestRoute exact path="/" component={Welcome} title="welcome"/>
                        <GuestRoute path="/admin/register" component={Register} title="register"/>
                        <GuestRoute path="/admin/login" component={Login} title="login"/>
                        <GuestRoute path="/admin/forgot-password" component={ForgotPassword} title="forgot password"/>
                        <GuestRoute path="/admin/password/reset/:token" component={ResetPassword} title="reset password"/>
                        <AuthRoute path="/admin/home" component={Home} title="home"/>
                        <AuthRoute path="/admin/profile/:id" component={Profile} title="profile"/>
                        <Route component={NotFound}/>
                    </Switch>
                </div>
            </Router>
    );
};

export default App;
