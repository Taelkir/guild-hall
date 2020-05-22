import React from "react";
import ReactDOM from "react-dom";

export default class Chat extends React.Component {
	state = { messages: null, messageToSend: null, room: window.roomId };

	componentDidMount() {
		fetch(`/messages/${window.roomId}/fetch`)
			.then(data => data.json())
			.then(json => {
				return this.setState(() => {
					return { messages: json };
				});
			});
	}
	handleInputChange = e => {
		let message = e.target.value.trim();
		this.saveMessageToState(message);
	};
	handleKeyDown = e => {
		if (e.key === "Enter") {
			this.sendMessage();
		}
	};
	saveMessageToState = value => {
		console.log("value: " + value);
		this.setState(
			() => {
				return {
					messageToSend: value
				};
			},
			() => console.log("state: " + this.state.messageToSend)
		);
	};
	sendMessage = () => {

	};

	render() {
		return (
			<div className="container">
				<ul className="chat">
					<li className="left clearfix" v-for="message in messages">
						<div className="chat-body clearfix">
							<div className="header">
								<strong className="primary-font">Character name</strong>
							</div>
							<p>Says this!</p>
						</div>
					</li>
				</ul>
				<div className="input-group">
					<input
						id="btn-input"
						type="text"
						name="message"
						className="form-control input-sm"
						placeholder="Type your message here..."
						onChange={this.handleInputChange}
						onKeyDown={this.handleKeyDown}
					/>

					<span className="input-group-btn">
						<button className="btn btn-primary btn-sm" id="btn-chat">
							Send
						</button>
					</span>
				</div>
			</div>
		);
	}
}

if (document.getElementById("chatWrapper")) {
	ReactDOM.render(<Chat />, document.getElementById("chatWrapper"));
}
