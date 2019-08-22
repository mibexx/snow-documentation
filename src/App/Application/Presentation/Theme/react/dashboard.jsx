import React from 'react';
import ReactDOM from 'react-dom';

class Dashboard extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {

        return (
            <b>Welcome</b>
        );
    }
}


if (document.getElementById('dashboard')) {
    ReactDOM.render(<Dashboard/>, document.getElementById('dashboard'));
}
