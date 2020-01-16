// import React from "react.production.min.js";
// import ReactDOM from "react-dom.production.min.js";

'use strict';


class LikeButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = {liked: false};
    }

    render() {
        if (this.state.liked) {
            return 'You liked this.';
        }

        return (
            <button className="btn btn-primary" onClick={() => this.setState({liked: true})}>
                Нравится
            </button>
        );
    }
}

const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(<LikeButton/>, domContainer);