<script type="text/template" id="ea-appointments-overview">
	<small><%= settings['trans.overview-message'] %></small>
	<table>
		<tbody>
			<% if(data.location.indexOf('_') !== 0) { %>
			<tr class="row-location">
				<td class="ea-label"><%= settings['trans.location'] %></td>
				<td class="value"><%= data.location %></td>
			</tr>
			<% } %>
			<% if(data.service.indexOf('_') !== 0) { %>
			<tr class="row-service">
				<td class="ea-label"><%= settings['trans.service'] %></td>
				<td class="value"><%= data.service%></td>
			</tr>
			<% } %>
			<% if(data.worker.indexOf('_') !== 0) { %>
			<tr class="row-worker">
				<td class="ea-label"><%= settings['trans.worker'] %></td>
				<td class="value"><%= data.worker %></td>
			</tr>
			<% } %>
			<% if (settings['price.hide'] !== '1') { %>
			<tr class="row-price">
				<td class="ea-label"><%= settings['trans.price'] %></td>
				<td class="value"><%= data.price %> <%= settings['trans.currency'] %></td>
			</tr>
			<% } %>
			<tr class="row-datetime">
				<td class="ea-label"><%= settings['trans.date-time'] %></td>
				<td class="value"><%= data.date %> <%= data.time %></td>
			</tr>
		</tbody>
	</table>
</script>
