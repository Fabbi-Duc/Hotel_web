<template>
  <article class="wrapper">
    <div class="mail-wrapper">
      <div class="mail-top shadow">
        <div class="mail-subject">FW:Jobs to Apply for</div>
        <div class="mail-action"></div>
      </div>
      <div class="mail-content">
        <div class="mail-body ">
          <div class="image">
            <img
              src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/avatars/avatar_tile_k_56.png"
            />
          </div>
          <div class="someClass">
            <div class="sender">
              <span>Kennedy</span>
              <span> to me </span>
            </div>
            <div class="message">
              The only thing I can think to do is trigger an event when the
              window resizes and dynamically set a new fixed width on text-div,
              but this just feels inelegant, especially considering padding and
              other neighboring artifacts I'd have to subtract out to get a
              proper width.
            </div>
          </div>
        </div>
        <div class="mail-footer shadow">
          <div class="image">
            <img
              src="https://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/avatars/avatar_tile_s_56.png"
            />
          </div>
          <div class="replybox">
            <div class="draft">
              <span>Draft </span
              ><span>to, Kennedy <i class="fa fa-angle-down"></i></span>
            </div>
            <textarea></textarea>
            <div class="left">
              <a href="#" class="send-btn">SEND</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>
<script>
export default {
  name: "Message"
};
</script>
<style lang="css" scoped>
.wrapper .mail-wrapper {
  margin: 50px 8%;
  transition: all 0.1s ease-in-out;
  background: white;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.16), 0 6px 12px rgba(0, 0, 0, 0.32);
}
.wrapper .mail-wrapper .mail-top {
  cursor: pointer;
  padding: 20px;
}
.wrapper .mail-wrapper .mail-body .someClass {
  margin: 0 20px 0 16px;
  width: auto;
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap: nowrap;
}
.wrapper .mail-wrapper .mail-body .someClass .sender {
  margin-top: 20px;
}
.wrapper .mail-wrapper .mail-body .someClass .sender > :first-child {
  font-weight: bold;
}
.wrapper .mail-wrapper .mail-body .someClass .message {
  padding: 30px 40px 20px 0;
}
.wrapper .mail-wrapper .mail-footer {
  background: rgba(117, 117, 117, 0.07);
}
.wrapper .mail-wrapper .mail-footer .replybox {
  margin: 0 20px;
  width: auto;
  overflow: hidden;
}
.wrapper .mail-wrapper .mail-footer .replybox:after {
  content: "";
  clear: both;
  left: 0;
}
.wrapper .mail-wrapper .mail-footer .replybox .draft {
  margin-top: 20px;
}
.wrapper .mail-wrapper .mail-footer .replybox .draft span {
  cursor: pointer;
}
.wrapper .mail-wrapper .mail-footer .replybox .draft span:nth-child(1) {
  color: #db4437;
  font-weight: bold;
}
.wrapper .mail-wrapper .mail-footer .replybox .draft i,
.wrapper .mail-wrapper .mail-footer .replybox .draft span:nth-child(2) {
  color: #999;
  font-weight: bold;
}
.wrapper .mail-wrapper .mail-footer .replybox .draft i:hover,
.wrapper .mail-wrapper .mail-footer .replybox .draft span:nth-child(2):hover {
  color: #333;
}
.wrapper .mail-wrapper .mail-footer .replybox textarea {
  font-family: inherit;
  background: rgba(117, 117, 117, 0.01);
  outline: none;
  border: none;
  width: 100%;
  resize: none;
  height: 60px;
}
.wrapper .mail-wrapper .mail-footer .replybox div {
  margin-bottom: 10px;
}
.wrapper .mail-wrapper .mail-footer .replybox a {
  text-decoration: none;
  color: #333;
  padding: 10px;
  display: inline-block;
  font-size: 20px;
}
.wrapper .mail-wrapper .mail-footer .replybox a:nth-child(2) {
  transform: rotate(-45deg);
}
.wrapper .mail-wrapper .mail-footer .replybox a.send-btn {
  cursor: pointer;
  background: #4285f4;
  text-decoration: none;
  position: relative;
  padding: 8px;
  font-size: 13px;
  border-radius: 2px;
  color: white;
  font-weight: normal;
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.14), 0 4px 6px rgba(0, 0, 0, 0.24);
}
.wrapper .mail-wrapper .mail-footer .replybox a.send-btn:hover {
  background: #2a75f3;
  text-shadow: 2px 2px rgba(0, 0, 0, 0.15);
  box-shadow: 0 3px 4px rgba(0, 0, 0, 0.14), 0 6px 8px rgba(0, 0, 0, 0.24);
}
.wrapper .mail-wrapper img {
  width: 36px;
}
.wrapper .shadow {
  box-shadow: 0 -1px 1px #e5e5e5, 0 2px 1px rgba(0, 0, 0, 0.12);
}

.image {
  float: left;
  padding: 12px 24px;
}
.image > img {
  width: 24px;
  border-radius: 50%;
}
</style>
