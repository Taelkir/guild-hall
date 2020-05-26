import React from "react";
import ReactDOM from "react-dom";

export default class Chat extends React.Component {
	state = {
		messages: [{ body: "loading messages..." }],
		messageToSend: null,
		room: window.roomId,
		character: window.characterId
	};

	componentDidMount() {
		fetch(`/messages/${window.roomId}/fetch`)
			.then(data => data.json())
			.then(json => {
				console.dir(json);
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
		let newMessage = {
			body: this.state.messageToSend,
			said_by: this.state.character,
			said_in: this.state.room
		};

		fetch(`/messages/${this.state.room}/store`, {
			method: "POST",
			body: JSON.stringify(newMessage),
			headers: {
				"X-CSRF-TOKEN": window.csrf,
				"Content-Type": "application/json"
			}
		})
			.then(response => response.json())
			.then(data => console.log(data));
	};

	render() {
		return (
			<div className="container">
				<ul className="chat">
					<li className="left clearfix" v-for="message in messages">
						{this.state.messages.map((message, index) => (
							<div className="chat-body clearfix" key={index}>
								<div className="header">
									<strong className="primary-font">{message.said_by}</strong>
								</div>
								<p>{message.body}</p>
							</div>
						))}
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
						<button
							className="btn btn-primary btn-sm"
							id="btn-chat"
							onClick={this.sendMessage}
						>
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
