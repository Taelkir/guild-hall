import React from "react";
import ReactDOM from "react-dom";

function Chat() {
	return (
		<div className="container">

		</div>
	);
}

export default Chat;

if (document.getElementById("chatWrapper")) {
	ReactDOM.render(<Chat />, document.getElementById("chatWrapper"));
}
