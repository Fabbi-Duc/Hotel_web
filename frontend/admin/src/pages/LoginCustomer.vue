<template>
  <div id="login-customer">
    <ValidationObserver ref="form" v-slot="{ handleSubmit }">
      <form class="login-box" @submit.prevent="handleSubmit(login)">
        <h1>Đăng nhập</h1>
        <ValidationProvider
          name="メールアドレス"
          rules="required|email"
          v-slot="{ errors }"
        >
          <div class="textbox">
            <input type="text" placeholder="Email" v-model="formSignIn.email" />
          </div>
          <span class="error text-left f-w3">{{ errors[0] }}</span>
        </ValidationProvider>
        <div class="textbox">
          <input
            type="password"
            placeholder="Mật khẩu"
            v-model="formSignIn.password"
          />
        </div>
        <input type="button" class="btn" value="Đăng nhập" @click="login" />
        <input type="button" class="btn" value="Đăng ký" @click="register" />
      </form>
    </ValidationObserver>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import axios from "axios";
export default {
  data() {
    return {
      formSignIn: {
        email: null,
        password: null,
      },
    };
  },
  methods: {
    async register() {
      console.log(1);
      await this.$router.push({ name: "RegisterCustomer" });
    },
    ...mapActions("auth", ["loginCustomer"]),
    async login() {
      await this.loginCustomer(this.formSignIn)
        .then(() => {
          this.$router.push({ name: "Customer" });
        })
        .catch(() => {});
    },
  },
};
</script>
<style lang="scss" scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

#login-customer {
  width: 100vw;
  height: 100vh;
  background: url("../assets/image/bg.jpg") no-repeat;
  background-size: cover;
}
.login-box {
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
.login-box h1 {
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox {
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox input {
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btn {
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: #fff;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px;
}
</style>