<template>
  <div>
    <CRow>
      <CCol md="6" xs="12">
        <CCard v-if="true">
          <CCardHeader>
            Radio switches
            <CBadge :color="radio" class="mr-auto">{{ radio }}</CBadge>
            <div class="card-header-actions">
              <a
                class="card-header-action"
                href="https://coreui.io/vue/docs/components/switch"
                rel="noreferrer noopener"
                target="_blank"
              >
                <small class="text-muted">docs</small>
              </a>
            </div>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-for="(color, key) in colors"
              :key="'radio' + key"
              v-bind="labelIcon"
              :checked="key === 2"
              :color="color"
              :value="color"
              class="mx-1"
              name="radio"
              type="radio"
              variant="3d"
              @update:checked="val => (val ? (radio = color) : null)"
            />
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch default
            <CBadge color="primary">{{ checker }}</CBadge>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              :checked.sync="checker"
              class="mx-1"
              color="primary"
              name="switch1"
            />
            <CSwitch
              v-for="(color, key) in [
                'secondary',
                'success',
                'warning',
                'info',
                'danger',
                'light',
                'dark'
              ]"
              :key="key"
              :color="color"
              checked
              class="mx-1"
            />
            <CSwitch class="mx-1" color="primary" disabled />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch pills
          </CCardHeader>
          <CCardBody>
            <CSwitch checked class="mx-1" color="primary" shape="pill" />
            <CSwitch checked class="mx-1" color="secondary" shape="pill" />
            <CSwitch checked class="mx-1" color="success" shape="pill" />
            <CSwitch checked class="mx-1" color="warning" shape="pill" />
            <CSwitch checked class="mx-1" color="info" shape="pill" />
            <CSwitch checked class="mx-1" color="danger" shape="pill" />
            <CSwitch checked class="mx-1" color="light" shape="pill" />
            <CSwitch checked class="mx-1" color="dark" shape="pill" />
            <CSwitch class="mx-1" color="primary" disabled shape="pill" />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            3d Switch
          </CCardHeader>
          <CCardBody>
            <CSwitch checked class="mx-1" color="primary" variant="3d" />
            <CSwitch checked class="mx-1" color="secondary" variant="3d" />
            <CSwitch checked class="mx-1" color="success" variant="3d" />
            <CSwitch checked class="mx-1" color="warning" variant="3d" />
            <CSwitch checked class="mx-1" color="info" variant="3d" />
            <CSwitch checked class="mx-1" color="danger" variant="3d" />
            <CSwitch checked class="mx-1" color="light" variant="3d" />
            <CSwitch checked class="mx-1" color="dark" variant="3d" />
            <CSwitch class="mx-1" color="primary" disabled variant="3d" />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            3d Switch <small><code>disabled</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              checked
              class="mx-1"
              color="primary"
              disabled
              variant="3d"
            />
            <CSwitch
              checked
              class="mx-1"
              color="secondary"
              disabled
              variant="3d"
            />
            <CSwitch
              checked
              class="mx-1"
              color="success"
              disabled
              variant="3d"
            />
            <CSwitch
              checked
              class="mx-1"
              color="warning"
              disabled
              variant="3d"
            />
            <CSwitch checked class="mx-1" color="info" disabled variant="3d" />
            <CSwitch
              checked
              class="mx-1"
              color="danger"
              disabled
              variant="3d"
            />
            <CSwitch checked class="mx-1" color="light" disabled variant="3d" />
            <CSwitch checked class="mx-1" color="dark" disabled variant="3d" />
            <CSwitch class="mx-1" color="primary" disabled variant="3d" />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            3d Switch <small><code>label</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="primary"
              shape="square"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              variant="3d"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              variant="3d"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>variant="outline"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch checked class="mx-1" color="primary" variant="outline" />
            <CSwitch checked class="mx-1" color="secondary" variant="outline" />
            <CSwitch checked class="mx-1" color="success" variant="outline" />
            <CSwitch checked class="mx-1" color="warning" variant="outline" />
            <CSwitch checked class="mx-1" color="info" variant="outline" />
            <CSwitch checked class="mx-1" color="danger" variant="outline" />
            <CSwitch checked class="mx-1" color="light" variant="outline" />
            <CSwitch checked class="mx-1" color="dark" variant="outline" />
            <CSwitch class="mx-1" color="primary" disabled variant="outline" />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>variant="outline" shape="pill"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              checked
              class="mx-1"
              color="primary"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="secondary"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="success"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="warning"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="info"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="danger"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="light"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              checked
              class="mx-1"
              color="dark"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              class="mx-1"
              color="primary"
              disabled
              shape="pill"
              variant="outline"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>variant="opposite"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch checked class="mx-1" color="primary" variant="opposite" />
            <CSwitch
              checked
              class="mx-1"
              color="secondary"
              variant="opposite"
            />
            <CSwitch checked class="mx-1" color="success" variant="opposite" />
            <CSwitch checked class="mx-1" color="warning" variant="opposite" />
            <CSwitch checked class="mx-1" color="info" variant="opposite" />
            <CSwitch checked class="mx-1" color="danger" variant="opposite" />
            <CSwitch checked class="mx-1" color="light" variant="opposite" />
            <CSwitch checked class="mx-1" color="dark" variant="opposite" />
            <CSwitch class="mx-1" color="primary" disabled variant="opposite" />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>variant="opposite" shape="pill"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              checked
              class="mx-1"
              color="primary"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="secondary"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="success"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="warning"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="info"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="danger"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="light"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              checked
              class="mx-1"
              color="dark"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              class="mx-1"
              color="primary"
              disabled
              shape="pill"
              variant="opposite"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="primary" />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
            />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="success" />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="warning" />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="info" />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="danger" />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="light" />
            <CSwitch v-bind="labelIcon" checked class="mx-1" color="dark" />
            <CSwitch v-bind="labelIcon" class="mx-1" color="primary" disabled />
          </CCardBody>
        </CCard>
        shape
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label shape="pill"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="primary"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              shape="pill"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              shape="pill"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label variant="outline"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="primary"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              variant="outline"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label variant="outline"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="primary"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              shape="pill"
              variant="outline"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              shape="pill"
              variant="outline"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label variant="opposite"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="primary"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              variant="opposite"
            />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol md="6" xs="12">
        <CCard>
          <CCardHeader>
            Switch <small><code>label variant="opposite"</code></small>
          </CCardHeader>
          <CCardBody>
            <CSwitch
              v-bind="labelTxt"
              checked
              class="mx-1"
              color="primary"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="secondary"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="success"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="warning"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="info"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="danger"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="light"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              checked
              class="mx-1"
              color="dark"
              shape="pill"
              variant="opposite"
            />
            <CSwitch
              v-bind="labelIcon"
              class="mx-1"
              color="primary"
              disabled
              shape="pill"
              variant="opposite"
            />
          </CCardBody>
        </CCard>
      </CCol>

      <CCol md="12">
        <CCard>
          <CCardHeader>
            Sizes
          </CCardHeader>
          <CCardBody class="p-0">
            <CDataTable
              :fields="fields"
              :items="items"
              class="table-align-middle mb-0"
              hover
              no-sorting
              striped
            >
              <template #example="{item}">
                <td>
                  <CSwitch
                    :checked="item.example.checked"
                    :color="item.example.color"
                    :size="item.example.size"
                    :variant="item.example.variant"
                  />
                </td>
              </template>
              <template #size_prop="{item}">
                <td>
                  <span v-html="item.size_prop"></span>
                </td>
              </template>
            </CDataTable>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
export default {
  name: "Switches",
  data() {
    return {
      colors: [
        "primary",
        "secondary",
        "warning",
        "success",
        "info",
        "danger",
        "light",
        "dark"
      ],
      fields: [
        { key: "size" },
        { key: "example" },
        { key: "size_prop", label: "Size prop" }
      ],
      items: [
        {
          size: "Large",
          example: {
            variant: "3d",
            color: "primary",
            size: "lg",
            checked: true
          },
          size_prop: 'Add following prop <code>size="lg"</code>'
        },
        {
          size: "Normal",
          example: { variant: "3d", color: "primary", size: "", checked: true },
          size_prop: "-"
        },
        {
          size: "Small",
          example: {
            variant: "3d",
            color: "primary",
            size: "sm",
            checked: true
          },
          size_prop: 'Add following prop <code>size="sm"</code>'
        }
      ],
      checker: true,
      radio: "warning",
      labelIcon: {
        labelOn: "\u2713",
        labelOff: "\u2715"
      },
      labelTxt: {
        labelOn: "yes",
        labelOff: "no"
      }
    };
  }
};
</script>
