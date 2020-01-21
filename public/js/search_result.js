'use strict';


class ProductsResult extends React.Component {
    constructor(props) {
        super(props);
        this.query = reactInit.query;
        this.state = {
            error: null,
            isLoaded: false,
            items: []
        };
    }

    componentDidMount() {

        fetch('http://phpsite.local/search/searchList')
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        isLoaded: true,
                        items: result
                    });
                },
                // Примечание: важно обрабатывать ошибки именно здесь, а не в блоке catch(),
                // чтобы не перехватывать исключения из ошибок в самих компонентах.
                (error) => {
                    this.setState({
                        isLoaded: true,
                        error
                    });
                }
            )
    }

    render() {
        const { error, isLoaded, items } = this.state;
        if (error) {
            return <div>Ошибка: {error.message}</div>;
        } else if (!isLoaded) {
            return <div>Загрузка...</div>;
        } else {
            return (
                <div className='row'>
                    {items.map(item => (
                        <div className="col-lg-3 col-md-4 col-sm-6 part">
                            <a className='title' href={'/catalog/product/'+item.id}>{item.name}
                                <img src={item.ph_link_1}/>
                                <div className='count'>
                                    <a>Macca: {item.weight}г</a>
                                    <a>({item.quantity}шт)<br/></a>
                                </div>
                                <a className='price'>Цена: {item.price}руб</a>
                            </a>
                        </div>
                    ))}
                </div>
            );
        }
    }
}

const domContainer = document.querySelector('#search_result_container');
ReactDOM.render(<ProductsResult/>, domContainer);