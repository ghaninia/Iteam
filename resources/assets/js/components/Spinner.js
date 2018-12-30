import React from "react" ;

export default class Spinner extends React.Component {

    constructor(props){
        super(props) ;
        this.state = {
            size : this.props.size || 15 ,
        }
    }

    render() {

        let { size } = this.state ;

        const style = {
            width :`${ size }px`,
            height :`${ size }px`
        } ;

        return (
            <div  className="spinner" style={ style }></div>
        );
    }
}