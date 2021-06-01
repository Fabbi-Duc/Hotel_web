<template>
  <div class="c-app flex-row align-items-center">
    <CContainer>
      <CRow class="justify-content-center">
        <CCol md="8">
          <CCardGroup>
            <CCard class="p-4">
              <CCardBody>
                <ValidationObserver ref="form" v-slot="{ handleSubmit }">
                  <CForm @submit.prevent="handleSubmit(login)">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <ValidationProvider
                      v-slot="{ errors }"
                      :name="$t('login.user_name')"
                      rules="required|email|min:10|max:100"
                    >
                      <CInput
                        v-model.trim="formSignIn.email"
                        :class="[errors[0] ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder="Username"
                      >
                        <template #prepend-content>
                          <CIcon name="cil-user" />
                        </template>
                      </CInput>
                      <div v-if="errors[0]" class="invalid-feedback">
                        {{ errors[0] }}
                      </div>
                    </ValidationProvider>
                    <ValidationProvider
                      v-slot="{ errors }"
                      :name="$t('login.password')"
                      rules="required|min:6|max:50"
                      vid="password"
                    >
                      <CInput
                        v-model.trim="formSignIn.password"
                        :class="[errors[0] ? 'is-invalid' : '']"
                        autocomplete="off"
                        placeholder="Password"
                        type="password"
                      >
                        <template #prepend-content>
                          <CIcon name="cil-lock-locked" />
                        </template>
                      </CInput>
                      <div v-if="errors[0]" class="invalid-feedback">
                        {{ errors[0] }}
                      </div>
                    </ValidationProvider>
                    <CRow>
                      <CCol class="text-left" col="6">
                        <CButton class="px-4" color="primary" type="submit"
                          >Login
                        </CButton>
                      </CCol>
                      <CCol class="text-right" col="6">
                        <CButton class="px-0" color="link"
                          >Forgot password?
                        </CButton>
                        <CButton class="d-lg-none" color="link"
                          >Register now!
                        </CButton>
                      </CCol>
                    </CRow>
                  </CForm>
                </ValidationObserver>
                <CRow>
                  <a :href="socialUrl">Login Google</a>
                </CRow>
              </CCardBody>
            </CCard>
            <CCard
              body-wrapper
              class="text-center py-5 d-md-down-none"
              color="primary"
              text-color="white"
            >
              <CCardBody>
                <h2>Sign up</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <CButton color="light" size="lg" variant="outline">
                  Register Now!
                </CButton>
              </CCardBody>
            </CCard>
          </CCardGroup>
        </CCol>
      </CRow>
    </CContainer>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { ValidationObserver, ValidationProvider } from "vee-validate";
import axios from "axios";

export default {
  name: "SignIn",
  components: {
    ValidationObserver,
    ValidationProvider
  },
  data() {
    return {
      formSignIn: {
        email: null,
        password: null
      },
      socialUrl: null
    };
  },
  methods: {
    ...mapActions("auth", ["signIn"]),
    async login() {
      await this.signIn(this.formSignIn)
        .then(() => {
          this.$router.push({ name: "Home" });
        })
        .catch(() => {});
    },
    async getUrlRedirectSocial() {
      await axios
        .get("http://localhost:8087/api/auth/google/url")
        .then(response => {
          this.socialUrl = response.data.data.url;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.getUrlRedirectSocial();
  }
};
</script>
