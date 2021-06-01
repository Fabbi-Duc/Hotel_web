<template>
  <div id="login-customer">
    <div class="login-box">
      <h1>REGISTER</h1>
      <ValidationObserver ref="form" v-slot="{ handleSubmit }">
        <form action="" @submit.prevent="handleSubmit(register)">
          <div v-show="step === 1">
            <ValidationProvider
              name="Name"
              rules="required"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">Name</label>
                <input
                  type="text"
                  placeholder="Name"
                  v-model="formRegister.name"
                />
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider
              name="Email"
              rules="required|email"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">Email</label>
                <input
                  type="text"
                  placeholder="Email"
                  v-model="formRegister.email"
                />
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider
              name="Password"
              rules="required"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">Password</label>
                <input
                  type="password"
                  placeholder="Password"
                  v-model="formRegister.password"
                />
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <input type="button" class="btn" value="Next" @click="next()" />
          </div>
          <div v-show="step === 2">
            <ValidationProvider
              name="Phone"
              rules="required|numeric"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">Phone</label>
                <input
                  type="text"
                  placeholder="Phone number"
                  v-model="formRegister.phone"
                />
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider
              name="Passport"
              rules="required|numeric"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">PASSPORT</label>
                <input
                  type="text"
                  placeholder="CMND"
                  v-model="formRegister.identity_card"
                />
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider
              name="Gender"
              rules="required"
              v-slot="{ errors }"
            >
              <div class="textbox">
                <label for="">Gender</label>
                <b-form-select v-model="formRegister.gender">
                  <b-form-select-option v-for="(item, index) in optionsGender" :key="index" :value="item.value">{{ item.text }}</b-form-select-option>
                </b-form-select>
              </div>
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <ValidationProvider
              name="Gender"
              rules="required"
              v-slot="{ errors }"
            >
              <label for="" style="font-size: 20px">Birthday</label>
              <input type="date" class="date" v-model="formRegister.birthday" />
              <span class="error text-left f-w3">{{ errors[0] }}</span>
            </ValidationProvider>
            <input
              type="button"
              class="btn"
              value="Previous"
              @click="Previous()"
            />
            <input
              type="submit"
              class="btn"
              value="Register"
            />
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>
<script>
import { mapActions } from "vuex";
import axios from "axios";
import { ValidationObserver, ValidationProvider } from "vee-validate";
export default {
  components: {
    ValidationObserver,
    ValidationProvider,
  },
  data() {
    return {
      step: 1,
      formRegister: {
        name: null,
        email: null,
        password: null,
        gender: null,
        phone: null,
        identity_card: null,
        birthday: null,
      },
      optionsGender: [
        {
          text: 'Nam',
          value: 0
        }, 
        {
          text: 'Nu',
          value: 1
        }
      ],
    };
  },
  methods: {
    next() {
      this.step++;
    },
    Previous() {
      this.step--;
    },
    async register() {
      await this.$store
        .dispatch("customer/registerCustomer", this.formRegister)
        .then((res) => {
          alert('Thanh cong');
          this.$router.push({name : 'LoginCustomer'})
        });
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
  width: 480px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
label {
  margin-bottom: 10px;
  font-weight: 600;
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
  width: 100%;
  float: left;
}
.date {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem 0.375rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 400;
  line-height: 1.5;
  border: 1px solid;
  border-radius: 0.25rem;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  color: #768192;
  border-color: #d8dbe0;
  outline: none;
}
.btn {
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: #fff;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin-top: 25px;
}
</style>