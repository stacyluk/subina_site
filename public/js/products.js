'use strict';


class Products extends React.Component {
    constructor(props) {
        super(props);
/*
        this.state = {liked: false};
*/
    }

    render() {
/*        if (this.state.liked) {
            return 'You liked this.';
        }*/

        return (
            <button className="btn btn-primary" onClick={() => this.setState({liked: true})}>
                Нравится
            </button>
        );
    }
}

const domContainer = document.querySelector('#product_catalog_container');
ReactDOM.render(<LikeButton/>, domContainer);