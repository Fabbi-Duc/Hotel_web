<template>
  <CRow>
    <CCol lg="3" sm="6">
      <CWidgetDropdown color="primary" header="9.823" text="Members online">
        <template #default>
          <CDropdown color="transparent p-0" placement="bottom-end">
            <template #toggler-content>
              <CIcon name="cil-settings" />
            </template>
            <CDropdownItem>Action</CDropdownItem>
            <CDropdownItem>Another action</CDropdownItem>
            <CDropdownItem>Something else here...</CDropdownItem>
            <CDropdownItem disabled>Disabled action</CDropdownItem>
          </CDropdown>
        </template>
        <template #footer>
          <CChartLineSimple
            :data-points="[65, 59, 84, 84, 51, 55, 40]"
            class="mt-3 mx-3"
            label="Members"
            labels="months"
            point-hover-background-color="primary"
            pointed
            style="height:70px"
          />
        </template>
      </CWidgetDropdown>
    </CCol>
    <CCol lg="3" sm="6">
      <CWidgetDropdown color="info" header="9.823" text="Members online">
        <template #default>
          <CDropdown
            :caret="false"
            color="transparent p-0"
            placement="bottom-end"
          >
            <template #toggler-content>
              <CIcon name="cil-location-pin" />
            </template>
            <CDropdownItem>Action</CDropdownItem>
            <CDropdownItem>Another action</CDropdownItem>
            <CDropdownItem>Something else here...</CDropdownItem>
            <CDropdownItem disabled>Disabled action</CDropdownItem>
          </CDropdown>
        </template>
        <template #footer>
          <CChartLineSimple
            :data-points="[1, 18, 9, 17, 34, 22, 11]"
            :options="{ elements: { line: { tension: 0.00001 } } }"
            class="mt-3 mx-3"
            label="Members"
            labels="months"
            point-hover-background-color="info"
            pointed
            style="height:70px"
          />
        </template>
      </CWidgetDropdown>
    </CCol>
    <CCol lg="3" sm="6">
      <CWidgetDropdown color="warning" header="9.823" text="Members online">
        <template #default>
          <CDropdown color="transparent p-0" placement="bottom-end">
            <template #toggler-content>
              <CIcon name="cil-settings" />
            </template>
            <CDropdownItem>Action</CDropdownItem>
            <CDropdownItem>Another action</CDropdownItem>
            <CDropdownItem>Something else here...</CDropdownItem>
            <CDropdownItem disabled>Disabled action</CDropdownItem>
          </CDropdown>
        </template>
        <template #footer>
          <CChartLineSimple
            :data-points="[78, 81, 80, 45, 34, 12, 40]"
            :options="{ elements: { line: { borderWidth: 2.5 } } }"
            background-color="rgba(255,255,255,.2)"
            class="mt-3"
            label="Members"
            labels="months"
            point-hover-background-color="warning"
            style="height:70px"
          />
        </template>
      </CWidgetDropdown>
    </CCol>
    <CCol lg="3" sm="6">
      <CWidgetDropdown color="danger" header="9.823" text="Members online">
        <template #default>
          <CDropdown color="transparent p-0" placement="bottom-end">
            <template #toggler-content>
              <CIcon name="cil-settings" />
            </template>
            <CDropdownItem>Action</CDropdownItem>
            <CDropdownItem>Another action</CDropdownItem>
            <CDropdownItem>Something else here...</CDropdownItem>
            <CDropdownItem disabled>Disabled action</CDropdownItem>
          </CDropdown>
        </template>
        <template #footer>
          <CChartBarSimple
            background-color="rgb(250, 152, 152)"
            class="mt-3 mx-3"
            label="Members"
            labels="months"
            style="height:70px"
          />
        </template>
      </CWidgetDropdown>
    </CCol>
  </CRow>
</template>

<script>
import { CChartBarSimple, CChartLineSimple } from "../charts/index.js";

export default {
  name: "WidgetsDropdown",
  components: { CChartLineSimple, CChartBarSimple }
};
</script>
